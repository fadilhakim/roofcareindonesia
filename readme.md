# PMOIS

## NOTE : before you hosting

### 1.List file you must change the setting in several files:

a. .env.development , if you want to code in development
b. .env , if you want to host your code
c. project_charter.js in path `public\js\pages\_project_initiate\project_charter.js`
d user.js in path `public\js\pages\_settings\user.js`
e. group.js in path `public\js\pages\_settings\group.js`

### 2. Example of changing the file

**a. change the .env.development**
change your local development :

```
BASE_URL="http://localhost/pmois"

DB_DSN=
DB_HOST=localhost
DB_NAME=db_pmois_2019
DB_USERNAME=root
DB_PASS=

```

**b. changing the .env**
change your .env base on your active settings

```
BASE_URL="pmois.lintasarta.net"

DB_DSN=
DB_HOST=localhost
DB_NAME=db_pmois_2019
DB_USERNAME=root
DB_PASS=

```

**c. change your hostname in project_charter.js**

in path :

```
public\js\pages\_project_initiate\project_charter.js
```

for example :

**1. if you want to development in local, set to this**

```js
var hostname = "http://localhost/pmois";
```

**2. if you want to host your code , set to this**

```js
var hostname = "pmois.lintasarta.net"; // or any other active domain
```
