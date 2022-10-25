#include <stdio.h>
#include <string.h>

void printSubStr(char* str, int low, int high)
{
	for (int i = low; i <= high; ++i)
		printf("%c", str[i]);
}

void longestPalSubstr(char* str)
{
	int n = strlen(str);

	int maxLength = 1, start = 0;
	int low, high;
	for (int i = 0; i < n; i++) {
		low = i - 1;
		high = i + 1;
		while (high < n
			&& str[high] == str[i])
			high++;

		while (low >= 0
			&& str[low] == str[i])
			low--;

		while (low >= 0 && high < n
			&& str[low] == str[high]) {
			low--;
			high++;
		}

		int length = high - low - 1;
		if (maxLength < length) {
			maxLength = length;
			start = low + 1;
		}
	}
	printSubStr(str, start, start + maxLength - 1);

}

int main()
{
	char str[] = "babad";
	longestPalSubstr(str);
	return 0;
}
