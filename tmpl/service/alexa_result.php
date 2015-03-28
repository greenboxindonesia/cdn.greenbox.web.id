<h4><?= $domain ?> Alexa statistics</h4>
<table class="table table-striped">
<thead>
<tr>
<th>Name</th>
<th>Value</th>
</tr>
</thead>
<tbody>
<tr>
<td>Rank</td>
<td><?= number_format($data['rank'], 0, '.', '.') ?></td>
</tr>

<tr>
<td>Links in</td>
<td><?= number_format($data['linksin'], 0, '.', '.') ?></td>
</tr>

<tr>
<td>Review count</td>
<td><?= number_format($data['review_count'], 0, '.', '.') ?></td>
</tr>

<tr>
<td>Review average</td>
<td><?= $data['review_avg'] ?></td>
</tr>
</tbody>
</table>

<h5>Demographics</h5>
<div class="row-fluid">
<div style="position:relative; z-index:0;">
<object width="100%" height="240px" type="application/x-shockwave-flash" class="thumbnail" style="z-index:1"
data="http://www.alexa.com/amMap/ammap.swf?data_file=http://www.alexa.com/amMap/index.php?url=<?= urlencode($domain) ?>&amp;settings_file=http://www.alexa.com/amMap/ammap_settings.xml&amp;path=http://www.alexa.com/amMap/ammap/">
<embed wmode="transparent">
<param name="bgcolor" value="#f8f9fc">
<!--<param name="wmode" value="opaque">-->
<param name="movie" value="http://www.alexa.com/amMap/ammap.swf?data_file=http://www.alexa.com/amMap/index.php?url=<?= urlencode($domain) ?>&amp;settings_file=http://www.alexa.com/amMap/ammap_settings.xml&amp;path=http://www.alexa.com/amMap/ammap" />
</object>
</div>


<h5>Audience</h5>
<div class="row-fluid">
<img class="thumbnail" src="http://traffic.alexa.com/graph?&amp;w=320&amp;h=230&amp;o=f&amp;c=1&amp;y=t&amp;b=ffffff&amp;r=1m&amp;u=<?= urlencode($domain) ?>" alt="AlexaRank" />
</div>