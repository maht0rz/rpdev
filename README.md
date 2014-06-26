rpdev
=====

Rapid Development class of Vibius PHP Framework

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
