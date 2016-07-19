#SEoRewrites

Provides an input mask available for applying simple rewriteRules.

##Changelog
- __v.1.0.0__ provides simple input -> output rewrites.
 Without any checks or modifications
- __v.1.0.1__ adds position and rewrite httpCode field
add a transferObject for dbalRowResult
add regexp in whereClause
add httpStatusCode in rewriteHeader

##Roadmap
- ~~add position~~
- ~~add basic regex~~
- add simple check for existing shopwareRewrites in s_core_rewrite_urls
- add target httpCode check with guzzle
- add csv/xls up-/down-load for rewrites
