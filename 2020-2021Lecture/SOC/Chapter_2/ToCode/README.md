
## ToCode2 :  XML Exercises 

Do the following exercises and save files in a Folder under your Github Account. Name the repository folder `ToCode2`.  Share with me via Microsoft team the repository URL and content.

### Exercice 1

*Création d’un livre en XML*

On souhaite écrire un livre en utilisant le formalisme XML. Le livre est structuré en sections (au moins 2), en chapitres (au moins 2) et en paragraphes (au moins 2).
Le livre doit contenir la liste des auteurs (avec nom et prénom).
Tous les éléments doivent posséder un titre, sauf le paragraphe qui contient du texte.
Proposez une structuration XML de ce document (avec 2 auteurs, 2 sections, 2 chapitres par section et 2 paragraphes par chapitre).
Vérifiez, à l’aide de l’éditeur, que votre document est bien formé.
Attention : ne pas utiliser d’attributs ; l’encodage utilisé est ISO-8859-1.
Votre document sera nommé `Livre1.xml`.

### Exercice 2

*Utilisation des attributs*

Conception de `livre2.xml` à partir de `livre1.xml`. 
On souhaite compléter la structure du document XML de l’exercice précédent par les attributs nom et prenom pour les auteurs et titre pour le livre, les sections et les chapitres.
Analysez la structure du nouveau document. Y a-t-il des simplifications possibles ?
Vérifiez, à l’aide de l’éditeur, que votre document est bien formé.

### Exercice 3

*Utilisation des entités prédéfinies*

On se propose de créer un nouveau document livre2bis.xml reprenant l’exercice précédent(livre2.xml). Placez dans 2 paragraphes un bloc de texte contenant l’extrait suivant :
` <element id="10">></element>`. Pour le premier paragraphe, employez les entités prédéfinies.Pour le deuxième paragraphe, employez une section `CDATA`.

### Exercice 4

Utilisation des espaces de noms par défaut et avec préfixe
Il s’agit de créer un document livre3.xml sur la base de livre1.xml en respectant les points suivants : Mettez tous les éléments dans l’espace de noms `http://www.masociete.com `sans utiliser d’espace de noms par défaut.
Mettez la deuxième section dans un espace de noms h`ttp://www.monentreprise.com`.
Mettez le dernier paragraphe du dernier chapitre de la dernière section sans espace de noms.

### Exercice 5: 

Validation d’un document XML par rapport à un schéma

`<?xml version="1.0" encoding="utf-8" ?> <Club clubId="ACM">

<Member id="_12345" clubs="ACM"> <Name>

         <FirstName>WEB</FirstName>
         
         <MiddleInitial>H</MiddleInitial>
         
         <LastName>DO</LastName>
         
      </Name>
      
   </Member>
   
</Club>`

Enregistrer le document XML ci-dessous sous le nom `club.xml` et vérifiez qu’il est conforme.

Enregistrer le schéma suivant et reliez-le au fichier xml `club.xml` pour qu’il soit valide par rapport à ce schéma :

`<?xml version="1.0" encoding="utf-8"?>

<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema">

<!-- Define the elements that make up a Member's Name --> <!-- Define a Member -->

<xs:element name="Member">

<xs:complexType>

<xs:sequence>

<xs:element name="Name" type="NameType" />

</xs:sequence>

<xs:attribute name="id" type="xs:ID" use="required" /> 
<xs:attribute name="clubs" type="xs:IDREFS" use="optional" /> 
</xs:complexType>
</xs:element>
<!-- Define the Club root element -->
<xs:element name="Club">
<xs:complexType>
<xs:sequence>
<xs:element ref="Member" />
</xs:sequence>
<xs:attribute name="clubId" type="xs:ID" use="required" /> </xs:complexType>
</xs:element>
<xs:complexType name="NameType" >
<xs:sequence>
<xs:element name="FirstName" type="xs:string" />
<xs:element name="MiddleInitial" type="xs:string" />
<xs:element name="LastName" type="xs:string" /> </xs:sequence>
</xs:complexType>
</xs:schema>`

Faites les modifications suivantes au schéma et au document xml : 

1.  **MiddleInitial** d’un **Membre** est optionnel.
2. Ajouter un élément **Email** optionnel après l’élément **Name**.
3. Faire en sorte qu’un **club** peut contenir zéro ou un nombre illimité de membre (utiliser **unbounded**).

### Exercice 6.

 Réalisation d’un schéma
 
Soit un document XML contenant un nombre indéterminé d’éléments sous la forme :

`<contact titre="..." techno="...">
<nom>...</nom>
<prenom>...</prenom>
<telephone> ...</telephone> 
<email>...</email>
<email>...</email>
...
</contact>`

L’élément **telephone** et l’attribut **techno** sont en option. Les textes seront des chaînes simples `xs:string`.

Vous utiliserez les types complexes **numerosType** et **contactType** pour construire un schéma nommé `annuaire.xsd`.


### Exercice 7. 

Construction de types simples

Créez un schéma `annuaire2.xsd` à partir du schéma de l’exercice précédent.

Définissez et utilisez les types simples suivants :
1. `technoType` : énumération dont les valeurs possibles sont `XML`, `Java`, `Autre`.
1. `telType` : liste de 5 entiers (attention : créez d’abord un type pour la liste d’entiers).

Validez ce nouveau schéma sur un document de votre conception.
