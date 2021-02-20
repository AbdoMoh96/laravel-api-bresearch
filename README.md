<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></p>


## About Bresearch

bresearch is a laravel app using the repository pattern.

## installation
<ul>
  <li> <code> npm install </code> </li>
  <li> <code> composer install </code> </li>
  <li> <code> php artisan migrate </code> </li>
  <li> <code> php artisan db:seed </code> </li>
  <li> <code> php artisan serve --port=8080 </code> </li>
  <li> <b>DB Name is :: bresearch </b></li>
</ul>

## some Api end points
#### client api end points 
<ul>
  <li> All, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/clients </code> </li> 
  <li> find by id, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/clients/${id} </code> </li>
  <li> find by first or last name, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/clients/${name} </code> </li>
  <li> create client, Request( post ) : <br/> <code> http://127.0.0.1:8080/api/clients </code> </li>
  <li> update client, Request( put ) : <br/> <code> http://127.0.0.1:8080/api/clients/${id} </code> </li>
</ul>

#### group api end points 
<ul>
  <li> All, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/groups </code> </li> 
  <li> find by id, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/groups/${id} </code> </li>
  <li> find by name, Request( get ) : <br/> <code> http://127.0.0.1:8080/api/groups/name/${name} </code> </li>
  <li> create group, Request( post ) : <br/> <code> http://127.0.0.1:8080/api/groups </code> </li>
  <li> update group, Request( put ) : <br/> <code> http://127.0.0.1:8080/api/groups/${id} </code> </li>
</ul>

### For more run :: <code> php artisan route:list </code>

