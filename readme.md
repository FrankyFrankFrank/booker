# Model Home Booker
Let model home agents book their appointments in advance and avoid disappointing your customers with long lineups!

Import your customer list and assign them auto login passwords!

Email notifications for confirmation and cancellation!

#Registrants Seeder

To seed a JSON list of appointment registrants use artisan command:
`php artisan db:seed --class="RegistrantsSeeder"`

This will seed the database from a JSON file located in your project directory you should name `registrants.json`

Format the JSON as below
```
{
"users": [
  {
    "email":"example@gmail.com",
    "firstname":"Adam",
    "lastname":"Frank",
    "password":"5Y>3mkQ?"
 }
}
```
The seeder will create a hash from the password provided.
