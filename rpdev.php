<?php
/*
 *  How to use rpdev class?
 *  1. Create folder app/storage
 * 
 *  2. Copy folder rpdev to app/  (app/rpdev)
 * 
 *  3. Create instance of rpdev class:
 *      $rpdev = new vibius\plugins\rpdev();
 * 
 *  4. Set login credentials for backend:
 *      $rpdev->setLoginCredentials(array('admin' => 'letmein'));
 * 
 *  5. Initialize generation process
 *      $rpdev->init();
 * 
 *  6. Register error view
 *      $rpdev->registerErrorHandler('rpdev/error');
 * 
 *  7. Register your pages:
 *      $rpdev->register('/','rpdev/homepage',array('title','content','footer'));
 *      
 *      Pattern:
 *      $rpdev->register(route,view,editable content);
 * 
 *  8. Creating templates
 *  
 *      Variables available in views:
 *          $baseUrl -> base path of your appplicaion, used to create links
 *          $uriKey -> used with assetsbootstraper
 * 
 *      Have a look at rpdev/homepage view to see, what templating rules are utilized to generate templates & layouts
 *          
 *  
 */
namespace vibius\plugins;

class rpdev{
    
    public $pages = array();
    public static $storagePath = 'app/storage';
    public function init(){
        $this->_view = new \vibius\core\View();
        $this->_router = new \vibius\core\Router();
        $this->_bootstraper = new \vibius\plugins\AssetsBootstraper();
        $this->_url = new \vibius\core\Url();
        $this->_app = new \vibius\core\App();
        $this->uriKey = ltrim(str_replace('/', '-', $_SERVER['REQUEST_URI']), '-');
        $_SESSION['assets'][$this->uriKey] = array();
        
        $this->registerTemplatingRules();
        $this->registerAssetsRoutes();
        $this->registerAdminRoutes();
        $this->setStoragePath();
        $this->_view->GlobalVar('baseUrl',$this->_url->to(''));
        $this->_view->GlobalVar('uriKey',$this->uriKey);
    }
    public function registerAssetsRoutes(){
        $assets = $this->_bootstraper;
        
        $this->_router->any('css/{%(.*?)%}',function($page) use($assets){
            $assets->addCollection('main',$_SESSION['assets'][$page]);
            echo $assets->getStylesheet('main');
        });
        $this->_router->any('js/{%(.*?)%}',function($page) use($assets){
            $assets->addCollection('main',$_SESSION['assets'][$page]);
            echo $assets->getJavaScript('main');
        });
    }
    
    public function registerAdminRoutes(){
        $_view = $this->_view;
       
        $this->_router->any('admin/login',function() use($_view){
            $_SESSION['isLoggedIn'] = false;
            $_SESSION['rpdev_token'] = md5(uniqid(mt_rand(), true));
            $_view->GlobalVar('token',$_SESSION['rpdev_token']);
            if(isset($_SESSION['isLoggedIn'])){
                if($_SESSION['isLoggedIn'] !== true){
                   $data['error'] = false;
                   $_view->load('rpdev/admin/login')->vars($data)->display(); 
                }else{
                    header('Location: '.$this->_url->to('admin/dashboard'));
                }
            }else{
                $data['error'] = false;
                $_view->load('rpdev/admin/login')->vars($data)->display(); 
            }
        });
        
        if(empty($this->users)){
            throw new \Exception('RPDev - No users specified for admin panel');
            return;
        }
        $credentials = $this->users;
        
        $this->_router->any('admin/dashboard',function() use($_view,$credentials){
            $validator = new \vibius\plugins\Validate();
            if(!$validator->exists(array('post:username','post:password','post:token')) && $_SESSION['isLoggedIn'] == false){
                $_SESSION['rpdev_token'] = md5(uniqid(mt_rand(), true));
                $_view->GlobalVar('token',$_SESSION['rpdev_token']);
                $data['error'] = 'Wrong username/password';
                return $_view->load('rpdev/admin/login')->vars($data)->display();
            }else{
                if($_SESSION['isLoggedIn'] !== true){
                    foreach($credentials as $user => $pass){
                        if($user == $_POST['username'] && $pass == $_POST['password'] && $_SESSION['rpdev_token'] == $_POST['token']){
                            $_SESSION['isLoggedIn'] = true;
                        }
                    }
                }
            }
            $_SESSION['rpdev_token'] = md5(uniqid(mt_rand(), true));
            $_view->GlobalVar('token',$_SESSION['rpdev_token']);
            if(isset($_SESSION['isLoggedIn'])){
                if($_SESSION['isLoggedIn'] === true){
                    
                   $data['pages'] = $this->getPagesList();
                    
                   $_view->load('rpdev/admin/dashboard')->vars($data)->display(); 
                }else{
                    $data['error'] = 'Wrong username/password';
                    return $_view->load('rpdev/admin/login')->vars($data)->display(); 
                }
            }else{
                $data['error'] = 'Wrong username/password';
                return $_view->load('rpdev/admin/login')->vars($data)->display(); 
            }
        });
        
        $this->_router->any('admin/logout',function(){
            $_SESSION['isLoggedIn'] = false;
            header('Location: '.$this->_url->to('admin/login'));
        });
        
        $this->_router->any('admin/edit/{%((?:[a-z0-9-_.@]*))%}',function($name) use($_view){
            if(empty($_SESSION['isLoggedIn'])){
                header('Location: '.$this->_url->to('admin/login'));
            }else{
                if($_SESSION['isLoggedIn'] === false){
                header('Location: '.$this->_url->to('admin/login'));  
                }
            }
            $name = explode('.php',$name);
            $name = $name[0];
            $data['name'] = $name;
            $data['sections'] = $this->getDataFromStorage($name);
            $data['pages'] = $this->getPagesList();
            $_view->load('rpdev/admin/edit')->vars($data)->display();
        });
        $this->_router->any('admin/edit/push/{%((?:[a-z0-9-_.@]*))%}',function($name) use($_view){
            if(empty($_SESSION['isLoggedIn'])){
                header('Location: '.$this->_url->to('admin/login'));
            }else{
                if($_SESSION['isLoggedIn'] === false){
                header('Location: '.$this->_url->to('admin/login'));  
                }
            }
            $storageFile = dirname(__DIR__).'/'.self::$storagePath.'/'.$name.'.php';
            $handle = fopen($storageFile,'w+');
            if($handle){
                foreach($_POST as $section => $value){
                    $storage[$section] = $value;
                }
                fwrite($handle, '<?php return '.var_export($storage,true).';');
            }
            header('Location: '.$this->_url->to('admin/dashboard'));
        });
        
        
    }
    
    public function registerErrorHandler($view){
        $_view = $this->_view;
        if(!$_view->exists($view)){
                throw new \Exception('RPDev - View not found');
        }
        $this->_app->add('error',function() use($_view,$view){
            $_view->load($view)->display();
        });
    }
    
    public function setLoginCredentials($users){
        $this->users = $users;
    }
    
    public function register($route,$view,$sections){
        if(!$this->_view->exists($view)){
            throw new \Exception('RPDev - View not found');
        }
        
        $this->initStorage($route,$view,$sections);
        
        $_view = $this->_view;
        $this->_router->any($route,function() use($_view,$view,$route){
            $storage = new \vibius\plugins\rpdev();
            $data = $storage->getDataFromStorage($route);
            $_view->load($view)->vars($data)->display();
        });
        
        
    }
    
    public function setStoragePath($path = 'app/storage'){
        self::$storagePath = $path;
    }
    
    /*
     * Following
     */
    public function initStorage($route,$view,$sections){
        $storageFile = dirname(__DIR__).'/'.self::$storagePath.'/'.(str_replace('/', '__slash__', $route)).'.php';
        if(!file_exists($storageFile)){
            $handle = fopen($storageFile,'w+');
            if($handle){
                foreach($sections as $section){
                    $storage[$section] = 'This section has not been edited yet.';
                }
                fwrite($handle, '<?php return '.var_export($storage,true).';');
            }
        }
    }
    
    public function getDataFromStorage($route){
        $storageFile = dirname(__DIR__).'/'.self::$storagePath.'/'.(str_replace('/', '__slash__', $route)).'.php';
        if(!file_exists($storageFile)){
            throw new \Exception('RPDev - Storage file not found ('.$storageFile.')');
            return;
        }
        $data = require($storageFile);
        return $data;
    }
    
    public function getDataFromStorageAdmin($route){
        $storageFile = dirname(__DIR__).'/'.self::$storagePath.'/'.$route.'.php';
        if(!file_exists($storageFile)){
            throw new \Exception('RPDev - Storage file not found ('.$storageFile.')');
            return;
        }
        $data = require($storageFile);
        return $data;
    }
    
    
    public function getPagesList(){
        $storage = dirname(__DIR__).'/'.self::$storagePath;
        $dir = scandir($storage);
        $dir = array_diff($dir, array('.','..'));
        foreach($dir as $page){
            $f = str_replace('__slash__', '/', $page);
            $f = explode('.php',$f);
            $f = $f[0];
            $pagesList[$page] = $f;
        }
        return $pagesList;
    }
    
    public function registerTemplatingRules(){
        $view = $this->_view;
        $url = $this->_url;
        $view->addRule('view',function($p) use($view){
           return $view->load($p)->getView();
        });

        $view->addRule('assets',function($p) use($url){
           array_push($_SESSION['assets'][$this->uriKey],$p);
        });
        
        $view->addRule('extends',function($p){
         return '
                 <?php
                  $v = new vibius\core\View();
                  $tpls["'.$p.'"] = $v->load("'.$p.'");
                  ?>
             ';
        });

        $view->addRule('display',function($p){
          return '<?php if(empty($data)){$data=array();} $tpls["'.$p.'"]->vars($data)->display(); ?>';
        });

        $view->addRule('section',function($p){
          return '<?php ob_start(); ?>';
        });

        $view->addRule('sectionEnd',function($p){
          return '<?php $data["'.$p.'"] = ob_get_clean();  ?> ';
        });
    }
    
}