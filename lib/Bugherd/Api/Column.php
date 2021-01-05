<?php

namespace Bugherd\Api;

class Column extends AbstractApi
{
    /**
     * List Columns
     *
     * @param  int $projectId the id of the project
     * @param  array $params the additional parameters (cf avaiable $params above)
     * @return array list of columns found
     */
    public function all($projectId,array $params = array())
    {
        return $this->retrieveAll('/projects/'.urlencode($projectId).'/columns.json', $params);
    }

    /**
     * Get information about a column given its id
     *
     * @param  string $projectId  the project id
     * @param  string $id     the task id
     * @return array  information about the column
     */
    public function show($projectId,$id)
    {
        return $this->get('/projects/'.urlencode($projectId).'/columns/'.urlencode($id).'.json');
    }



    /**
     * Create a new column given an array of $params
     *
     * @param  string $projectId  the project id
     * @param  array             $params the new column data
     * @return mixed
     */
    public function create($projectId,array $params = array())
    {
        $params = array_filter(array_merge($defaults, $params));

        $data = array('column'=>$params);

        return $this->post('/projects/'.urlencode($projectId).'/columns.json',$data);
    }

    /**
     * Update column information's
     *
     * @param  int $projectId  the project id
     * @param  int            $id     the column number
     * @param  array         $params
     * @return boolean
     */
    public function update($projectId,$id, array $params)
    {
         $data = array('column'=>$params);

        return $this->put('/projects/'.urlencode($projectId).'/columns/'.urlencode($id).'.json', $data);
    }


}