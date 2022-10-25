#include <stdio.h>
#include <stdlib.h>

struct Node
{
    int data;
    struct Node *next;
};

struct Node *newNode(int data)
{
    struct Node *new_node = (struct Node *)malloc(sizeof(struct Node));
    new_node->data = data;
    new_node->next = NULL;
    return new_node;
}

void push(struct Node **head_ref, int new_data)
{
    struct Node *new_node = newNode(new_data);
    new_node->next = (*head_ref);
    (*head_ref) = new_node;
}

void printList(struct Node *head)
{
    struct Node *temp = head;
    while (temp != NULL)
    {
        printf("%d ", temp->data);
        temp = temp->next;
    }
}

void testCase(int data[], int pos)
{
    int myData[] = data;
    struct Node *head = NULL;
    for (int i = 0; i < sizeof(myData) / sizeof(myData[0]); i++)
    {
        push(&head, myData[i]);
    }

    if (pos < (sizeof(myData) / sizeof(myData[0])) && pos >= 0)
    {
        printf("true");
    }
    else
    {
        printf("false");
    }
}

int main()
{
    int data1[] = {3, 2, 0, -4};
    int pos1 = 1;
    testCase(data1, pos1);

    int data2[] = {1, 2};
    int pos2 = 0;
    testCase(data2, pos2);

    int data3[] = {1};
    int pos3 = -1;
    testCase(data3, pos3);

    return 0;
}
