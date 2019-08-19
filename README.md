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


Often times, librarians are faced with situations where they have to check whether papers authored by researchers in their institutions are in compliance with the funders policies. In our case at the KEMRI-Wellcome Trust Research Programme, we were faced with a situation whereby we were required to check if authors acknowledged the funder(The Wellcome Trust) in their publications. Considering that KEMRI-Wellcome Trust publishes approximately 200 articles per year, this task would require back-breaking work of downloading and reading over 600 articles.

**How i solved problem 2**

I used ContentMine API's specically: [getpapers](https://github.com/ContentMine/workshop-resources/blob/master/software-tutorials/getpapers/README.md), [norma](https://github.com/ContentMine/workshop-resources/blob/master/software-tutorials/norma/README.md) and [ami](https://github.com/ContentMine/workshop-resources/tree/master/software-tutorials/ami) to:
1. Download json and XML files for KEMRI-Wellcome Trust articles from National Library of Medicine PubMed Central,
2. Convert XML files downloaded into Scholarly HTML(sHTML),
3. Read(text mine) all sHTML files for the term "Funded by the Wellcome Trust".



