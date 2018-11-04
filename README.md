There are few coding challanges. Once you are ready to show your solutions, please send me the invitation to your GitHub/Bitbucket repository. 

Notice: every function should be covered by unit tests.

Good luck!

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
findUnique([ 'Aa', 'aaa', 'aaaaa', 'BbBb', 'Aaaa', 'AaAaAa', 'a' ]); // => 'BbBb'
findUnique([ 'abc', 'acb', 'bac', 'foo', 'bca', 'cab', 'cba' ]); // => 'foo'
findUnique([ 'silvia', 'vasili', 'victor' ]; //victor
findUnique([ 'Tom Marvolo Riddle', 'I am Lord Voldemort', 'Harry Potter' ] // Harry Potter
findUnique([ '     ', 'a', ' ' ] // a
```

Strings may contain spaces. Spaces is not significant, only non-spaces symbols matters. E.g. string that contains only spaces is like empty string.

It's guaranteed that array contains more than 3 strings.


**Challenge #4**

Write an encoder/decoder library. It will take two arguments:
- key - string should contains only unique letters(case sensitive) and digits
- message - string to encode/decode (shouldn't shorter than key)

At first create a new one numeric key while basing on a provided key by assigning each letter position in which it is located after setting the letters from key in a some kind of alphabetical order. Requested order looks like that (big letters, small letters, numbers):

`2e1Ca` => `Cae12`

For that sorted string key, we should get that numeric key:

`Cae12` => `45231`

That numbers are the initial positions of the pre-sorted `2e1Ca` string.

Next you should encode our message with previously generated key.
Let's try to encode `secretinformation` string then. Afterall, it will look like that:

-- before encoding --
```
4 5 2 3 1
---------
s e c r e
t i n f o
r m a t i
o n
```


-- after encoding --
```
1 2 3 4 5
---------
e c r s e
o n f t i
i a t r m
      o n
```

So the result for message `secretinformation` and key `2e1Ca` is `ecrseonftiiatrm   on`
