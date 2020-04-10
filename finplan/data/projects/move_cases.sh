#!/bin/bash

for file in *; do
	if [[ -e ${file}/geninf_data.xml ]]; then
		name=$(grep studyName ${file}/geninf_data.xml | sed -e 's%.*studyName>\(.*\)</studyName.*%\1%' | sed -e 's,\W,_,g')
		mv $file ${name}
	fi
done

