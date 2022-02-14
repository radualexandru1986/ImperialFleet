###Install

<p>$ git clone git@github.com:radualexandru1986/ImperialFleet.git</p>
<p>$ composer install </p>
<p>$ php artisan key:generate </p>
<p>$ php artisan migrate:fresh --seed </p>
<p>$ php artisan test </p>

_______________________________

###Routes

- Create a new ship <code> POST:: /ships </code> ( validators : <code>Http/Requests/StoreShip.php </code>)
- Update an existing ship <code> PATCH:: /ships/${id} </code> ( validators : <code>Http/Requests/UpdateShip.php </code>)
- Delete an existing ship <code> DELETE:: /ships/${id} </code>
- View an existing ship <code> GET:: /ships/${id} </code>
- View all ships  <code> GET:: /ships </code>
- Filter ships -- **Example**: <code>GET:: api/ships?filters[orderBy]=id&&filters[direction]=asc </code>

_______________________________

## 3ev.com Assignment - Requirements

You are R3-D3 and were just appointed the General of the Imperial Fleet. Your first
action as the new General is to digitise the Imperial Fleet inventory.
####
Each spacecraft within the Imperial Fleet has the following characteristics:
- Name
- Class
- Armament
- Crew
- Image
- Value
- Status
####
You need to create a Galactic database (using MySQL) that stores all the spacecraft
details
####
Following that, you need to create a Galactic application programming interface (REST
API) in DroidSpeak (Laravel/Lumen) that will handle the following:
#### List all the spaceships allowing filtering by name, class, status
<code>
{
"data":[<br>
{
"id": 1,
"name": "Devastator",
"status": "Operational"
}, <br>
{
"id": 2,
"name": "Red Five",
"status": "Damaged"
},<br>
....
} 
</code>

####Show details of a single spaceship
<code> 
{
"id": 1, <br>
"name": "Devastator", <br>
"class": "Star Destroyer", <br>
"crew": 35000, <br>
"image": "https:\\url.to.image", <br>
"value": 1999.99, <br>
"status": "operational", <br>
"armament": [ <br>
{
"title": "Turbo Laser",
"qty": "60"
}, <br>
{
"title": "Ion Cannons",
"qty": "60",
}, <br>
{
"title": "Tractor Beam",
"qty": "10",
}, <br>
] <br>
}
</code>

####Create a new spaceship 
<code>
{
 "success": true
 }

</code>

####Edit/update an existing spaceship
<code>
{
 "success": true
 }

</code>

####Delete an existing spaceship
<code>
{
 "success": true
 }

</code>

###Assessment requirements 

- Design and create a MySQL database with tables to fit all the fields and data types
based on the examples above.
- Ensure your code is tidy and well documented
- All endpoints must return a JSON response
- Add validation to all endpoints where applicable
- Have your completed code ready to run locally for a show and tell review with a Senior
  Developer and a Technical Director 

####Bonus points are available 

- if the create, update and delete interface can only be performed by an
  authorised
  member of the imperial fleet (authenticated users)
- if unit tests are included in the delivered code 
-  if you can prove you can make the Kessel Run in less than 11 parsecs 
