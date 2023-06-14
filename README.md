# API Portfolio Items

I created a laravel project with a simple API to record skills, education and professional experiences to create a resume

## API Routes

### Auth
##### POST
###### Without JTW  Token
* /login JSON: {"email":"luisrohden@gmail.com","password":"123456"}
* /register JSON: {"email":"luisrohden@gmail.com","password":"123456","name":"Luis Rohden"};
###### With JTW Token
* /logout';

### Skills 
##### GET
###### Without JTW  Token
* /api/skills
* /api/skills/3
##### POST
###### With JTW Token
* /api/skills/create JSON: {"title":"some title","description":"some description"}
* /api/skills/edit JSON: {"id":1,"title":"alter title","description":"some description"}
* /api/skills/delete JSON: {"id":1}


