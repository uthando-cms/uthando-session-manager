<?php

return array(
  'UthandoSessionManager\Module'                                    => __DIR__ . '/UthandoSessionManager.php',

  'UthandoSessionManager\Controller\SessionManagerController'       => __DIR__ . '/src/UthandoSessionManager/Controller/SessionManagerController.php',
  
  'UthandoSessionManager\Hydrator\Session'                          => __DIR__ . '/src/UthandoSessionManager/Hydrator/Session.php',
  
  'UthandoSessionManager\Mapper\Session'                            => __DIR__ . '/src/UthandoSessionManager/Mapper/Session.php',
  
  'UthandoSessionManager\Model\Session'                             => __DIR__ . '/src/UthandoSessionManager/Model/Session.php',
  
  'UthandoSessionManager\Service\Factory\SessionManagerFactory'     => __DIR__ . '/src/UthandoSessionManager/Service/Factory/SessionManagerFactory.php',
  'UthandoSessionManager\Service\Factory\SessionSaveHandlerFactory' => __DIR__ . '/src/UthandoSessionManager/Service/Factory/SessionSaveHandlerFactory.php',
  
  'UthandoSessionManager\Service\SessionManager'                    => __DIR__ . '/src/UthandoSessionManager/Service/SessionManager.php',
  
  'UthandoSessionManager\View\Request'                              => __DIR__ . '/src/UthandoSessionManager/View/Request.php',
);
