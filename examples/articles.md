
### Create an Article
```php
try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$article = new ZayconWhatCounts\Article;
	$article
		->setName("Another Test Article")
		->setTitle("Another Test from WhatCounts")
		->setDescription("This is the description");

	$whatcounts->createArticle($article);

	$whatcounts->handleDump($article);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}
```

### Update Article

```php

try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$article_id = 1;
	$article = $whatcounts->getArticleById($article_id);
	Kint::dump($article);

	$article
		->setName("Another Test Article")
		->setDescription("This is the description (updated)");
	$whatcounts->updateArticle($article);

	$whatcounts->handleDump($article);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}

```

### Delete An Article

```php
try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$article = new ZayconWhatCounts\Article;
	$article
		->setName("Another Test Article")
		->setDescription("This is the description");

	$whatcounts->createArticle($article);

	if ($whatcounts->deleteArticle($article))
	{
		echo "Article deleted";
	}
	else
	{
		echo "Article not deleted.";
	}
	
	$whatcounts->handleDump($article);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}
```

### Get Article By Id

```php
try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$article = $whatcounts->getArticleById(1);

	$whatcounts->handleDump($article);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}

```

### Get Article By Name

```php
	try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$article = $whatcounts->getArticleByName('Test Article');

	$whatcounts->handleDump($article);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}
```

### Get Articles

```php
try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$articles = $whatcounts->getArticles();

	$whatcounts->handleDump($articles);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}

```