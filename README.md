# SnowAcademy

php public/server.php

curl -X "GET" http://localhost:8080/pet/1

curl -X "DELETE" http://localhost:8080/pet/1

 curl -X "POST" http://localhost:8080/pet -H "Content-Type: application/json" -d '{"name":"Simba", "age": 6, "color":"red", "type":"lablador"}'

  curl -X "PUT" http://localhost:8080/pet -H "Content-Type: application/json" -d '{"id":14, "name":"Bubuś"}'