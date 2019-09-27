## Documentation
1) copy .env.dist and rename .env.local and in this file change with your parameters

2) `php bin/console d:d:c`

3) `php bin/console d:m:d` and `php bin/console d:m:m`

4) You can run `php bin/console app:load-datas` if you want datas test

5) don't forget to encode your password in database with `php bin/console security:encode-password`

6) For used api, go on `http:localhost:yourport/api/login_check` for getting your token.(JWT Token are implemented)

7) If you want see the all links in the api you go on `http://localhost:yourport/api/doc` (it's not json document)


### JWT 
1) put the directory in config/ or if you want a fresh key you can make:
`$ mkdir -p config/jwt
$ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
$ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout`

and put your generated password in .env.local
