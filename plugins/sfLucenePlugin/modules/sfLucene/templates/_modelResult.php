<a href="<?php echo url_for(add_highlight_qs(str_replace("amp;", "", $result->getInternalUri()), $query))?>"><?php echo highlight_keywords($result->getInternalTitle(), $query, sfConfig::get('app_lucene_result_highlighter', '<strong class="highlight">%s</strong>')) ?></a>
<p><?php echo highlight_result_text($result->getInternalDescription(), $query, sfConfig::get('app_lucene_result_size', 200), sfConfig::get('app_lucene_result_highlighter', '<strong class="highlight">%s</strong>')) ?></p>