#!/usr/bin/env bash
function get_branch() {
      git branch --no-color | grep -E '^\*' | awk '{print $2}' \
        || echo "default_value"
      # or
      # git symbolic-ref --short -q HEAD || echo "default_value";
}

echo "Enter branch name to merge";
read TARGETEDBRANCH
CURRENTBRANCH=`get_branch`

#if [ `git branch --list $TARGETEDBRANCH` ]
#then
#   echo "Branch name $TARGETEDBRANCH already exists."
#fi

if [ $CURRENTBRANCH = $TARGETEDBRANCH ]
then
    echo "You are already in $CURRENTBRANCH branch"
    exit
fi

git pull $CURRENTBRANCH
git checkout $TARGETEDBRANCH
git pull $TARGETEDBRANCH
git merge $CURRENTBRANCH
git push origin $TARGETEDBRANCH
git checkout $CURRENTBRANCH

echo "Done";
