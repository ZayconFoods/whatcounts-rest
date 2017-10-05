### Get Campaigns

```php
try
{
	/* initialize whatcounts */
	$whatcounts = new ZayconWhatCounts\WhatCounts( WC_REALM, WC_PASSWORD );

	$campaigns = $whatcounts->getCampaigns();

	$whatcounts->handleDump($campaigns);
}
catch (Exception $e)
{
	$whatcounts->handleException($e);
}
```