for file in *; do
    sed -e '/RoundPlace/s:\(<t[dh]\)>:\1 class="number">:' -i ${file};
#    sed -e '/RoundPlace/s:\(<t[dh]\)>:\1 class="number">:' ${file} | diff -u ${file} -;
done
   