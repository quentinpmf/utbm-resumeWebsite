# QBo : Informations GitHub

<h4>Description des branches basiques</h4>
- dev : branche de pré-production utilisée pour les tests/recette post mise en prod.
- master : branche de production.

<h4>Ajout de branches supplémentaires</h4>
- QBo_dev : branche sur laquelle Quentin fera ses développements
- ADe_dev : branche sur laquelle Adrien fera ses développements
- master_old : branche qui servira de sauvegarde de la branche master

<h4>Workflow pour le projet</h4>
- Chaque développement sera commencé sur une des branches QBo_dev ou ADe_dev
- Le but étant de détailler au maximum les commits dans une optique de retrouver facilement les lignes de codes écrites/modifiées dans le futur.
- Une fois le développement terminé sur la branche personnelle et les tests effectuées, il faudra effectuer un Merge Request de QBo_dev ou ADe_dev > dev (afin de voir si le développement en question s'intègre bien avec le reste du projet)
- Si tout est OK sur la branche dev, que le développement mis en pré-prod ne comporte pas de bugs, alors on fait une sauvegarde de master avant la mise en prod (Merge request de master > master_old )
- Puis ensuite Merge Request de dev > master pour la mise en production.
- Tests d'intégrations lors de la mise en production de la même manière que sur dev.
- Si OK, on ne fait rien de plus, si NOK, on corrige en repartant de la branche QBo_dev ou ADe_dev et en suivant de nouveau le workflow ci-dessus.
