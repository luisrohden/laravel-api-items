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

### Jobs

##### GET / Without JTW  Token

* /jobs/by/1
* /jobs

###### POST / With JTW Token

            


* /jobs/create JSON: {"company":"company name","position":"position name","started_at":"2020-10-01","ended_at":"2020-10-01|NULL","user_id":1,"description":"text|nullable"}
* /jobs/edit/1 JSON: {"company":"company name|nullable","position":"position name|nullable","started_at":"2020-10-01|nullable","ended_at":"2020-10-01|NULL","user_id":1|nullable,"description":"text|nullable"}
* /jobs/delete/ JSON: {"jobs":"1,2,3,30"}

### Skills 
##### GET / Without JTW  Token
* /api/skills
* /api/skills/3
##### POST / With JTW Token
* /api/skills/create JSON: {"title":"some title","description":"some description"}
* /api/skills/edit JSON: {"id":1,"title":"alter title","description":"some description"}
* /api/skills/delete JSON: {"id":1}


