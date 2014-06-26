rpdev
=====

Rapid Development class of Vibius PHP Framework

 How to use rpdev class?
 *  Create folder app/storage
 
 *  Copy folder rpdev to app/  (app/rpdev)
  
 *   Create instance of rpdev class:
       ''$rpdev = new vibius\plugins\rpdev();''
  
 *   Set login credentials for backend:
       $rpdev->setLoginCredentials(array('admin' => 'letmein'));
  
 *   Initialize generation process
       $rpdev->init();
  
 *   Register error view
       $rpdev->registerErrorHandler('rpdev/error');
  
 *   Register your pages:
       $rpdev->register('/','rpdev/homepage',array('title','content','footer'));
       
       Pattern:
       $rpdev->register(route,view,editable content);
  
 *   Creating templates
 
       Variables available in views:
           $baseUrl -> base path of your appplicaion, used to create links
           $uriKey -> used with assetsbootstraper
  
       Have a look at rpdev/homepage view to see, what templating rules are utilized to generate templates & layouts
