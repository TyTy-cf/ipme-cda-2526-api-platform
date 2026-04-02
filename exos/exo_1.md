
### 1. Finaliser les entités


- Ajouter une colonne "slug" pour l'entité Fuel (il sera **nullable**)
- Faites attention à la migration générée !
- Vous pouvez ajouter chaque entité créée en tant qu'`ApiResource`
- Laissez bien dès que nécessaire, les relations en bilatérales...


### 2. Modifier l'entité `Fuel`


- Opérations autorisées : 

| HTTP           | Accès      |
| -------------- |------------|
| GET:COLLECTION | PUBLIC     |
| GET:ITEM       | PUBLIC     |
| POST           | ROLE_ADMIN |
| PATCH          | ROLE_ADMIN |
| DELETE         | ROLE_ADMIN |

- Modifier le `POST` & le `PATCH` de l'entité `Fuel`, pour avoir seulement les propriétés suivantes :
  - `type`
  - `logo`
- Ajouter une contrainte `NotBlank` sur les proprités `type` et `logo`
- Faire en sorte de ne pas récupérer les `listing` liés à l'entité `Fuel` et ce, même pour le `GET:ITEM` !
- Autoriser les filtres suivants sur l'entité :
  - `SearchFilter` sur `type`  (en `partial`)
  - `OrderFilter` sur `type`


### 3. Modifier l'entité `User`


- Opérations autorisées :

| HTTP           | Accès                     |
| -------------- |---------------------------|
| GET:ITEM       | PUBLIC                    |
| POST           | PUBLIC                    |
| PATCH          | ROLE_USER & USER CONNECTE |

- Modifier le `POST` & le `PATCH` de l'entité `User`, pour avoir seulement les propriétés suivantes :
    - `birthAt`
    - `email`
    - `firstName`
    - `lastName`
    - `password`
    - `phone`
    - `photo`
    - `siret`
- Ajouter une contrainte `NotBlank` sur les proprités :
  - `email`
  - `password`
- Les autres propriétés sont **nullables**
- Autoriser les filtres suivants sur l'entité :
    - `SearchFilter` sur `email`, `firstName`  & `lastName` (en `partial`)
    - `OrderFilter` sur `email`, `firstName`  & `lastName`


### 4. Modifier l'entité `Address`


- Opérations autorisées :

| HTTP   | Accès                     |
|--------|---------------------------|
| POST   | ROLE_USER                 |
| PATCH  | ROLE_USER & USER CONNECTE |
| DELETE | ROLE_USER & USER CONNECTE |

- Modifier le `POST` & le `PATCH` de l'entité `Address`, pour avoir seulement les propriétés suivantes :
    - `city`
    - `latitude`
    - `longitude`
    - `streetName`
    - `streetNumber`
    - `zipCode`
- Ajouter une contrainte `NotBlank` sur les proprités :
    - `city`
    - `latitude`
    - `longitude`
    - `streetName`
    - `streetNumber`
    - `zipCode`
  - Vous pouvez ajouter une contrainte `Regex`, pour autoriser seulement les chiffres, sur les propriétés :
    - `latitude`
    - `longitude`
    - `zipCode`
- Autoriser les filtres suivants sur l'entité :
    - `SearchFilter` sur `city`, `streetName`  & `zipCode` (en `partial`)
    - `OrderFilter` sur `city` & `zipCode`


### 5. Modifier l'entité `Model`


- Opérations autorisées :

| HTTP           | Accès      |
| -------------- |------------|
| GET:COLLECTION | PUBLIC     |
| GET:ITEM       | PUBLIC     |
| POST           | ROLE_ADMIN |
| PATCH          | ROLE_ADMIN |
| DELETE         | ROLE_ADMIN |

- Modifier le `POST` & le `PATCH` de l'entité `Model`, pour avoir seulement les propriétés suivantes :
    - `name`
    - `brand`
- Ajouter une contrainte `NotBlank` sur les proprités `name`
- Faire en sorte de ne pas récupérer les `listing` liés à l'entité `Model` et ce, même pour le `GET:ITEM` !
- Autoriser les filtres suivants sur l'entité :
    - `SearchFilter` sur `name` et `brand.name`  (en `partial`)
    - `OrderFilter` sur `name` et `brand.name`


### 6. Modifier l'entité `Brand`


- Opérations autorisées :

| HTTP           | Accès      |
| -------------- |------------|
| GET:COLLECTION | PUBLIC     |
| GET:ITEM       | PUBLIC     |
| POST           | ROLE_ADMIN |
| PATCH          | ROLE_ADMIN |
| DELETE         | ROLE_ADMIN |

- Modifier le `POST` & le `PATCH` de l'entité `Brand`, pour avoir seulement les propriétés suivantes :
    - `name`
- Ajouter une contrainte `NotBlank` sur les proprités `name`
- Faire en sorte de ne pas récupérer les `models` liés à l'entité `Brand` et ce, même pour le `GET:ITEM` !
- Autoriser les filtres suivants sur l'entité :
    - `SearchFilter` sur `name` (en `partial`)
    - `OrderFilter` sur `name`


### 7. Modifier l'entité `Image`


- Opérations autorisées :

| HTTP           | Accès     |
| -------------- |-----------|
| POST           | ROLE_USER & USER CONNECTE |
| PATCH          | ROLE_USER & USER CONNECTE |
| DELETE         | ROLE_USER & USER CONNECTE |

- Modifier le `POST` & le `PATCH` de l'entité `Image`, pour avoir seulement les propriétés suivantes :
    - `path`
    - `listing`
- Ajouter une contrainte `NotBlank` sur les proprités `path` & `listing`
- Faire en sorte de ne pas récupérer les `listings` liés à l'entité `Image`


### 8. Modifier l'entité `Favorite`


- Opérations autorisées :

| HTTP           | Accès      |
| -------------- |------------|
| POST           | ROLE_USER |
| DELETE         | ROLE_USER & USER CONNECTE |

- Modifier le `POST` de l'entité `Image`, pour avoir seulement les propriétés suivantes :
    - `user`
    - `listing`
- Ajouter une contrainte `NotBlank` sur les proprités `user` & `listing`
- Faire en sorte de ne pas récupérer les `listings` et les `users` liés à l'entité `Favorite`


### 9. Mettre en place les listeners


2 Listeners sont attendus afin d'automatiser l'ajout des propriétés :
- `createdAt` de `Favorite`, `User` et `Listings` 
- `slug` de `Brand`, `Model` et `Fuel` 


### 10. Modifier l'entité `Listing`


- Opérations autorisées :

| HTTP           | Accès      |
| -------------- |------------|
| GET:COLLECTION | PUBLIC     |
| GET:ITEM       | PUBLIC     |
| POST           | ROLE_USER  |
| PATCH          | ROLE_USER & USER CONNECTE  |

- Modifier le `POST` & le `PATCH` de l'entité `Listing`, pour avoir seulement les propriétés suivantes :
    - `title`
    - `description`
    - `mileage`
    - `price`
    - `producedAt`
    - `address`
    - `fuel`
    - `model`\
Vous devrez trouvez un moyen d'automatiser l'ajout de la propriété `owner`...
- Ajouter une contrainte `NotBlank` sur les proprités `title`, `description`, `mileage`, `price`, `producedAt`, `address`, `fuel` & `model`
- Ajouter une contrainte `Positive` sur les proprités `mileage` & `price`, pour qu'elles ne soient pas inférieures à 0 
- Voici les propriétés à récupérer lors d'un `GET:COLLECTION` :
    - `title`
    - `mileage`
    - `price`
    - `model.fullName` => (Faire une fonction permettant de concaténer `model.name`et `brand.name`)
    - `images`
    - `address.city`
- Voici les propriétés à récupérer lors d'un `GET:ITEM` :
    - `title`
    - `description`
    - `mileage`
    - `producedAt`
    - `price`
    - `model`
    - `images`
    - `fuel`


