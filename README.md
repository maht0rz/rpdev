
Rapid Development Class 
======
 
 Speeds up web development, and generates backend dashboard with updatable content.

 How to use rpdev class?
 *  Create folder ``app/storage``
 
 *  Copy folder views/rpdev to app/views/  (app/views/rpdev)

 *  Copy folder rpdev to public/  (public/rpdev) 

 * Copy rpdev.php into ``plugins`` directory

 *   Create instance of rpdev class in routes.php:
       ``$rpdev = new vibius\plugins\rpdev();``
  
 *   Set login credentials for backend:
       ``$rpdev->setLoginCredentials(array('admin' => 'letmein'));``
     Admin panel is available at route ``admin/login``
  
 *   Initialize generation process
       ``$rpdev->init();``
  
 *   Register error view
       ``$rpdev->registerErrorHandler('rpdev/error');``
  
 *   Register your pages:
      ``$rpdev->register('/','rpdev/homepage',array('title','content','footer'));``
      You can copy in routes.php file with pre-registred homepage.
       
       Pattern:
       ``$rpdev->register(route,view,editable content);``
  
 *   Creating templates
 
       Variables available in views:
           ``$baseUrl`` -> base path of your appplicaion, used to create links
           ``$uriKey`` -> used with assetsbootstraper
  
       Have a look at ``views/rpdev/homepage`` view to see, what templating rules are utilized to generate templates & layouts
