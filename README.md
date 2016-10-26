# Project 2: PHP Basics

## Live URL
[http://p2.lengjai.me](http://198.199.71.252/p2/)

## Description
A simple utility for generating [xkcd style passwords](http://xkcd.com/936/).

## Demo
[Screencast Link](https://youtu.be/2tHmKaan_lg)

## Details for teaching team
Originally, I wrote the shell script filter_words_file.sh to preprocess the data in file usr_share_dict_words because the file was too large.  I used the script to filter words with lengths of 2 to 6 letters.  

But, after testing with the words file from /usr/share/dict, I realized the words produced were very obscure.  So, I udpated the words file to be common English words from the website <http://www.wordfrequency.info>.  

I downloaded the list of words from <http://www.wordfrequency.info> into the file wordfrequency.info_words and then ran the command 'sort wordfrequency.info_words | grep -v - | uniq > words' to filter out words with hyphens.

## Outside code
* Bootstrap: http://getbootstrap.com/
* Bootstrap Theme: http://bootswatch.com/flatly/
* jQuery Mobile Form Sliders: http://www.w3schools.com/jquerymobile/jquerymobile_form_sliders.asp
* jQuery Mobile Form Radio Buttons: http://www.w3schools.com/jquerymobile/jquerymobile_form_inputs.asp

&copy; 2016
