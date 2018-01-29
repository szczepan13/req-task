
**Challenge #1**
```
Write a function, which is taking one parameter(string, without any restriction to chars). From that string, you should take all big letters and build from it the new one. When there is not enough of big letters or they are missing, you should take the small ones instead. The returned string should contain only three big letters.

Examples:
"Test Me Please" => "TMP"
"TEst me please" => "TES"
"Tst Me please" => "TMS"
"tEst Me please" => "EMT"
"test Me please" => "MTE"
"test me please" => "TES"
"test me pleasE" => "ETE"
```

**Challenge #2**

Your task is to sort a given string. Each word in the string will contain a single number. This number is the position the word should have in the result.

Notes: 
1. Numbers can be from 1 to 9. So 1 will be the first word (not 0).
2. There won't be any numbers duplications like `is2 4a is2`.

If the input string is empty, return an empty string. The words in the input string will only contain valid consecutive numbers.

For an input: "is2 Thi1s T7est 4a" the function should return "Thi1s is2 4a T7est"

**Challenge #3**

There is an array of strings. All strings contains similar letters except one. Try to find it!

```
find_uniq([ 'Aa', 'aaa', 'aaaaa', 'BbBb', 'Aaaa', 'AaAaAa', 'a' ]); // => 'BbBb'
find_uniq([ 'abc', 'acb', 'bac', 'foo', 'bca', 'cab', 'cba' ]); // => 'foo'
find_uniq([ 'silvia', 'vasili', 'victor' ]; //victor
find_uniq([ 'Tom Marvolo Riddle', 'I am Lord Voldemort', 'Harry Potter' ] // Harry Potter
find_uniq([ '     ', 'a', ' ' ] // a
```

Strings may contain spaces. Spaces is not significant, only non-spaces symbols matters. E.g. string that contains only spaces is like empty string.

It’s guaranteed that array contains more than 3 strings.


**Challenge #4**

Management wants to have some query searcher in their site. It looks like that:

```
term:value term2:"value2" term3:"value value" term4:"value : value : value"
```

what gives:
```
[
	"term" => "value",
	"term2" => "value2",
	"term3" => "value value",
	"term4" => "value : value : value"
]
```

Your function is taking two parameters:
- array of available terms
- string to parse

Error handling:
1. When term from given string is not available - throw an exception
2. When given string is invalid(like e.g.: `value value` - without giving term` - throw an exception




Once you are ready to show your solutions, please send me the invitation to your GitHub/Bitbucket repository. We're waiting for your solutions until the next Monday (5th of February)

Notice: every function should be covered by unit tests.

Good luck!
