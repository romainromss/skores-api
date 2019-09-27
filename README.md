## Documentation
1) copy .env.dist and rename .env.local and in this file change with your parameters

2) `php bin/console d:d:c`

3) `php bin/console d:m:d` and `php bin/console d:m:m`

4) You can run `php bin/console app:load-datas` if you want datas test

5) don't forget to encode your password in database with `php bin/console security:encode-password`

6) For used api, go on `http:localhost:yourport/api/login_check` for getting your token.(JWT Token are implemented)

7) If you want see the all links in the api you go on `http://localhost:yourport/api/doc` (it's not json document)
