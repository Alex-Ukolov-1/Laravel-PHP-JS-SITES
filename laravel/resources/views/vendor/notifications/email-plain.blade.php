<?php
if (! empty($greeting)) {
  echo $greeting, "\n\n";
}

if (! empty($introLines)) {
  echo implode("\n", $introLines), "\n\n";
}

if (isset($actionText)) {
  echo "{$actionText}: {$actionUrl}", "\n\n";
}

if (! empty($outroLines)) {
  echo implode("\n", $outroLines), "\n\n";
}

echo 'С наилучшими пожеланиями,', "\n";
echo 'администрация сайта.', "\n";
