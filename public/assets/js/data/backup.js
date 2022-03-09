const old_tasks = [{
    Task_ID: 1,
    user_id: 1,
    name: 'Plans 2015',
    Task_Start_Date: '2015-01-01T00:00:00',
    Task_Due_Date: '2015-04-01T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 4,
    Task_Completion: 100,
    parent_id: 0,
},
{
    Task_ID: 29,
    user_id: 1,
    name: 'Prepare 2015 Marketing Plan',
    Task_Start_Date: '2015-01-01T00:00:00',
    Task_Due_Date: '2015-01-31T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 4,
    Task_Completion: 100,
    parent_id: 1,
},
{
    Task_ID: 38,
    user_id: 1,
    name: 'Update Sales Strategy Documents',
    Task_Start_Date: '2015-02-20T00:00:00',
    Task_Due_Date: '2015-02-22T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 2,
    Task_Completion: 100,
    parent_id: 29,
},
{
    Task_ID: 41,
    user_id: 1,
    name: 'Review 2012 Sales Report and Approve 2015 Plans',
    Task_Start_Date: '2015-02-23T00:00:00',
    Task_Due_Date: '2015-02-28T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 2,
    Task_Completion: 100,
    parent_id: 29,
},
{
    Task_ID: 42,
    user_id: 1,
    name: 'Deliver R&D Plans for 2015',
    Task_Start_Date: '2015-03-01T00:00:00',
    Task_Due_Date: '2015-03-10T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 4,
    Task_Completion: 100,
    parent_id: 1,
},
{
    Task_ID: 43,
    user_id: 1,
    name: 'Create 2015 R&D Plans',
    Task_Start_Date: '2015-03-01T00:00:00',
    Task_Due_Date: '2015-03-07T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 2,
    Task_Completion: 100,
    parent_id: 42,
},
];

const employees = [{
    ID: 1,
    Name: 'John Heart',
    Picture: 'images/employees/01.png',
}, {
    ID: 2,
    Name: 'Samantha Bright',
    Picture: 'images/employees/04.png',
}];

const priorities = [
    { id: 1, value: 'Low' },
    { id: 2, value: 'Normal' },
    { id: 3, value: 'Urgent' },
    { id: 4, value: 'High' },
];
