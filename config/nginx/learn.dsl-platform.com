server {
  listen learn.dsl-platform.com:80;
  server_name learn.dsl-platform.com;

  access_log /var/www/dsl-sandbox/logs/nginx/access.log combined buffer=32k;
  error_log /var/www/dsl-sandbox/logs/nginx/error.log;

  location / {
    proxy_pass http://learn-dsl-platform-runner:43000;
    proxy_set_header Host $host;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header X-Forwarded-Proto $scheme;
  }
}
