#commands drush for hacks 

drush site-install standard \
--db-url='mysql://root:sejalivre@localhost:3306/drupal9drush' \
  --account-name=admin --account-pass=sejalivre \
  --site-name=DRUPAL9DRUSH \
  --site-mail=marcio@ambientelivre.com.br;
