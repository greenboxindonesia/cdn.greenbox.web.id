#!/bin/bash
TIMESTAMP=$(date +"%F")

#export database to backup file .sql + upload git
#mysqldump --user=gbcoid_jurukunci --password=hNnvazUsqMV3uxC gbcoid_gudangku_onk79 > gbcoid_gudangku_onk79-$TIMESTAMP.sql
#echo "*********************************";
#echo "** File sql sitehome has been backup. **"
#echo "*********************************";

# submit to repository - setbefore update
git add --all
git commit -m "Update Repo date $TIMESTAMP"
git push
#git config --global user.email "alb3rt.mail@gmail.com"
#git config --global user.name "Albert"
echo "*********************************";
echo "** All file has been submit . **"
echo "*********************************";
exit
