# API Portfolio Items

I created a laravel project with a simple API to record skills, education and professional experiences to create a resume

## API Routes

### Skills 
##### GET
* /api/skills
* /api/skills/3
##### POST
* http://127.0.0.1:8000/api/skills/create JSON: {"title":"some title","description":"some description"}
* http://127.0.0.1:8000/api/skills/edit JSON: {"id":1,"title":"alter title","description":"some description"}
* http://127.0.0.1:8000/api/skills/delete JSON: {"id":1}


