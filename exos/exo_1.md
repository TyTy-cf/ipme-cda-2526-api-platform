
### 1. Finaliser les entités


- Ajouter une colonne "slug" pour l'entité Fuel (il sera **nullable**)
- Faites attention à la migration générée !
- Vous pouvez ajouter chaque entité créée en tant qu'`ApiResource`
- Laissez bien dès que nécessaire, les relations en bilatérales...


### 2. Modifier l'entité `Fuel`


- Opérations autorisées : `GET:COLLECTION`, `GET:ITEM`, `POST`, `PATCH`, `DELETE`
- Modifier le `POST` & le `PATCH` de l'entité `Fuel`, pour ne pas prendre en compte le `slug`
- Ajouter une contrainte `NotBlank` sur les proprités `name` et `logo`
- Faire en sorte de ne pas récupérer les `listing` liés à l'entité `Fuel` et ce, même pour le GET:ITEM !
- Autoriser les filtres suivants sur l'entité :
  - `SearchFilter` sur `name` 
  - `OrderFilter` sur `name`


### 3. Modifier l'entité `User`


- Opérations autorisées : `GET:ITEM`, `POST`, `PATCH` 
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
    - `SearchFilter` sur `email`, `firstName`  & `lastName`
    - `OrderFilter` sur `email`, `firstName`  & `lastName`


