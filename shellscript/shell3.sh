length=$(wc -c <$1)
if [ "$length" -ne 0 ] && [ -z "$(tail -c -1 <$1)" ]; then
  # The file ends with a newline or null
  dd if=/dev/null of=file obs="$((length-1))" seek=1
fi
