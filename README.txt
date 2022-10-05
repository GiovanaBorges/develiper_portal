Files:

config.php		: thsi file contains the configuration to your tokenziation server such as Token Group,
Token Template, Token Server,Detokenize/tokenize URL

addcustomer.php	: add entries to database

delete.php		: delete entries from database

demo.php		: This page queries the database and detokenizes/ masks values determined on the user

index.html		: Landing Page to the tokenization server. Users must provide login and password

vtsdemo.sql 	: SQL file that create VTS database, creates Customer Table and assigns all priviliges on 
VTS demo to user 'Apache@localhost'


CSS files:
main.css  
reset.css  
structure.css

Procedure:

Install mysql
remove autherntication from mysql login
execute "vtsdemo.sql"
ensure apache has all privileges granted on vtsdemo Database
edit config.php file and specify Token Group, Token Template and Token Server
now go ahead and play

