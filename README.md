# unicucWeb
# sitio web para aprender a usar github, html, css, javascript, php, y sql. 

-----------------------
## Comandos de git 

### Pasos para modificar un repositorio.

1.  `git status` Muestra donde estamos, los cambios que se hicieron localmente, etc.
2.  `git add .` Permite preparar los cambios realizados para ser incluidos en el próximo commit. Al ejecutar git add ., Git marca todos los archivos modificados y sin seguimiento en el directorio actual y sus subdirectorios para que sean parte del próximo commit.
3.  `git commit -a -m Mensaje` Para etiquetar y cargar los cambios.
4.  `git pull origin main` Para recuperar cambios desde un repositorio remoto y fusionarlos automáticamente con la rama local actual para que no se  mezclen las ramas remotas con loscal.
5.  `git push origin main` o `git push` Se utiliza para enviar cambios locales confirmados a un repositorio remoto. 

-----------------------
### Pasos para unir ramas.

1.   `git status` Proporciona información detallada sobre el estado actual de los archivos en su proyecto.
2.   `git checkout <nombre-de-rama>` Usalo para cambiar a la rama destino  en la que se desea fusionar el contenido de otra rama.
3.    `git merge <contenido>` Con este comando git fusionará los cambios de `contenido` a `nombre-de-rama` 
4.    - Resuelve los conflictos, si los hay. Para resolver un conflicto, debes abrir el archivo que contiene el conflicto y fusionar los cambios manualmente.
      - Indica a Git que has resuelto los conflictos. Para ello, debes ejecutar el siguiente comando:
      `git add <archivo>`
5.    `git commit -a -m "Mensaje"` Confirma los cambios y agrega un mensaje.

6. git push? La neta no se si se tiene que poner este, no me acuerdo jaja
### Nota
Antes de fusionar una rama, asegúrate de que está actualizada. Puedes hacerlo ejecutando el comando `git pull`.
