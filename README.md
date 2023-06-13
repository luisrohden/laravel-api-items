# API Portfolio Items

I created a laravel project with a simple API to record skills, education and professional experiences to create a resume

## API Routes

### Skills 
##### GET
* /api/skills
* /api/skills/3
##### POST
* /api/skills/create JSON: {"title":"some title","description":"some description"}
* /api/skills/edit JSON: {"id":1,"title":"alter title","description":"some description"}
* /api/skills/delete JSON: {"id":1}


