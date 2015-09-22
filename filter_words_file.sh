#!/bin/sh
#
# Filters words out of a specified file that meet the length criteria
# and prints them out.
#
# usage: filter_words_file.sh words_file [min_length] [max_length]
#
# example: filter_words_file.sh /usr/share/dict/words
#

# if the number of arguments specified is incorrect,
# then print out command line usage and exit
if [ $# -ne 1 ] && [ $# -ne 3 ] ; then
  echo usage: $0 words_file
  exit 1
fi

# parse command line arguments
FILE=$1
MIN=2
MAX=6
if [ $# -eq 3 ] ; then
  MIN=$2
  MAX=$3
fi

# read each line in the file
while read LINE
do
  # get the length of the line
  LENGTH=$(echo "$LINE" | awk "{print length}")

  # if the length is within range, then print out the line
  if [ "$LENGTH" -ge "$MIN" ] && [ "$LENGTH" -le "$MAX" ] ; then
    echo $LINE
  fi
done < $FILE
