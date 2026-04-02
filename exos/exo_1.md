
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
  - `name`
  - `logo`
- Ajouter une contrainte `NotBlank` sur les proprités `name` et `logo`
- Faire en sorte de ne pas récupérer les `listing` liés à l'entité `Fuel` et ce, même pour le `GET:ITEM` !
- Autoriser les filtres suivants sur l'entité :
  - `SearchFilter` sur `name`  (en `partial`)
  - `OrderFilter` sur `name`


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


