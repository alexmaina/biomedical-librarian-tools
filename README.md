# biomedical-librarian-tools
This repository will describe tools that can be useful to biomedical librarians working in research institutes.

The first tool is named remove_duplicates.php. 
The problem with bibliographic databases is that they contain references from different sources(e.g., pubmed/medline,Wiley Science, Sciencedirect etc),  and are often times in different formats(Books, Bookchapters, peer-reviewed journal articles, pre-print manuscripts, Thesis etc). Most of these references however, originate from pubmed/medline, the main free-access indexing and abstracting database that specializes in biomedical literature. This script aims at discarding duplicates from the table refs in the publications database.It aims at discarding references with duplicate PMIDs(Pubmed ids).
