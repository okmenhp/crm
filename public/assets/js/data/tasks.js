const tasks2 = [{
    id: 1,
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
    id: 29,
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
    id: 38,
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
    id: 41,
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
    id: 42,
    user_id: 2,
    name: 'Deliver R&D Plans for 2015',
    Task_Start_Date: '2015-03-01T00:00:00',
    Task_Due_Date: '2015-03-10T00:00:00',
    Task_Status: 'Completed',
    Task_Priority: 4,
    Task_Completion: 100,
    parent_id: 1,
},
{
    id: 43,
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
    id: 1,
    name: 'Minh',
    avatar: 'https://scontent.fhph1-1.fna.fbcdn.net/v/t1.6435-1/196824814_649517239781782_318469577319149641_n.jpg?stp=dst-jpg_p160x160&_nc_cat=104&ccb=1-5&_nc_sid=7206a8&_nc_ohc=5pqYKmKbtg8AX9xnI_u&_nc_ht=scontent.fhph1-1.fna&oh=00_AT_Q4lfntoi5aSgmYgkkWXERz6liPGEhXpu2Wwz3QYG8gw&oe=624D2698',
}, {
    id: 2,
    name: 'Dũng',
    avatar: 'https://scontent.fhph2-1.fna.fbcdn.net/v/t39.30808-6/273424696_4795735260534096_6518809834390113709_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=P26QP9k4lJ8AX_f9A_4&_nc_ht=scontent.fhph2-1.fna&oh=00_AT-CIXvPP6_9P9h8m1yhh0reiyISO7D6b39Y5E0MqRdzhw&oe=622D8A3F',
}];

const priorities = [
    { id: 1, value: 'Low' },
    { id: 2, value: 'Normal' },
    { id: 3, value: 'Urgent' },
    { id: 4, value: 'High' },
];
