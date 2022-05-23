# laravel
Nginx auth file .htpasswd, that contain in main directory. To work nginx auth insert .htpasswd file to conf directory in nginx directory.
And insert next info to nginx.conf that conain in nginx directory

        location / {
            # path to mysql,mysqli,phpmyadmin
            root   phpmyadmin; 
            index  index.php;
	        try_files $uri $uri/ /index.php;       

        location /public {
            #path to laravel
            root   laravel 
            index  index.php;
 	        auth_basic " Basic Authentication ";
  	        try_files $uri $uri/ /index.php;
            
        location ~ \.php$ {

  		  # Protect access
          #path to laravel
 	        root   /OpenServer/domains/homework;    
	        auth_basic_user_file .htpasswd;
  	        try_files $uri $uri/ =404;
	        fastcgi_pass    127.0.0.1:8000;
	        fastcgi_index   index.php;
 		include         fastcgi.conf;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
  		
          }
     }
       
        }
Username: abcd
Password: $apr1$6ijfuc9g$Fn4EMQjY8kujtkpC73eIm.


This main directory contains a file .htaccess, which configure to route main(/) url.<br>
Then to work this web site app you have to login or register(if you haven't login).<br>
Note: I completed the task as I understood
Laravel Php Junior
