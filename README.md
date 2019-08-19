# biomedical-librarian-tools

Type: Utilities

Title: Biomedical-librarian -tools

Date: 2019-07-19

Author: Alex Maina <alexmaina@afroscholar.info>

Maintainer: Alex Maina

# Description: 
This repository contains various tools that can be useful to biomedical librarians working in research institutes and institutes of higher learning specifically in the field of biology and medicine.

## Problem 1 - Duplicates

The first tool is known as remove_dipicates.php

Dependencies: PHP 7,MySQL, ContentMine API


**How i solved problem 1**

## Problem 2 - Checking published articles for regulatory purposes


Often times, librarians are faced with situations where they have to check whether papers authored by researchers in their institutions are in compliance with the funders policies. In our case at the KEMRI-Wellcome Trust Research Programme, we were faced with a situation whereby we were required to check if authors were publishing in open access journals and whether the papers were published under CC-BY licence.

We were also keen to know if the papers were publishing were attributing the funder's(The Wellcome Trust) role. Considering that KEMRI-Wellcome Trust publishes approximately 200 articles per year, this task would require back-breaking work of downloading and reading over 600 articles one by one and sifting through.

**How i solved problem 2**

First and foremost i selected accession_numbers(PMIDs) of a subset of articles which were already archived in NLM PubMed Central(PMC). Out of 693 articles published between the year 2016 - 19 August 2019, 601 articles were openaccess.It is this 609 articles that i used to test ContentMine text mining abilities.
I used ContentMine API's specically: [getpapers](https://github.com/ContentMine/workshop-resources/blob/master/software-tutorials/getpapers/README.md), [norma](https://github.com/ContentMine/workshop-resources/blob/master/software-tutorials/norma/README.md) and [ami](https://github.com/ContentMine/workshop-resources/tree/master/software-tutorials/ami) to:
1. Download json and XML files for KEMRI-Wellcome Trust articles from National Library of Medicine PubMed Central,
2. Convert XML files downloaded into Scholarly HTML(sHTML),
3. Read(text mine) all sHTML files for the term "Funded by the Wellcome Trust".

I first installed the three ContentMine API's onto my Ubuntu 18.04 box. Afterwards, i selected PMIDS for all articles published by KEMRI-Wellcome Trust authors in the years 2016-2019. These articles formed a corpus of 605 articles. I then created a folder /directory named `pall2016-2019` and added a file named`REGEXFILE.xml` to be used by `ami` for text mining.I incorporated all the contentMine commands in a bash file named `programmeall.sh` and ran the script on the terminal as follows. 

`sudo bash /home/alex/Documents/programmeall.sh`

Note the use of `sudo` command. I used this command since it is required to have root privileges to create directories on my localhost.(This might not be necessary if you are logged in as root in whatever environment you are on).

Finally, i ran `getfiles.php` whose function is to get all articles that don't acknowledge or state the funders role.

Note that counterchecking is required for improved accuracy.




