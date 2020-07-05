<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('insertRecord')) {
    function insertRecord($table_name, $data)
    {
        $ci =& get_instance();
        $qry = $ci->db->insert($table_name, $data);
        if ($qry) {
            $res = array(
                'success' => true,
                'record_id' => $ci->db->insert_id(),
                'message' => 'Data saved successfully!!'
            );
        } else {
            $res = array(
                'success' => false,
                'message' => 'Problem encountered while saving record, try again!!'
            );
        }
        return $res;
    }
}


if (!function_exists('Addmember')) {
    function Addmember($table_name, $data)
    {
        $ci =& get_instance();
        $qry = $ci->db->insert($table_name, $data);
        if ($qry) {
            $id = $ci->db->insert_id();


            $accountnumber = 'Vi' . date('Y') . '0' . $id;
            $update = updateRecord(array('id' => $id), $table_name, array('account_number' => $accountnumber));

            if ($update) {
                $res = array(
                    'success' => true,
                    'account_number' => $accountnumber,
                    'message' => 'Data saved successfully!!'
                );
            } else {
                $res = array(
                    'success' => false,
                    'message' => 'Problem encountered while assigning an account number'
                );
            }
        } else {
            $res = array(
                'success' => false,
                'message' => 'Problem encountered while saving record, try again!!'
            );
        }

        return $res;
    }
}


if (!function_exists('AddStaff')) {
    function AddStaff($table_name, $data)
    {
        $ci =& get_instance();
        $qry = $ci->db->insert($table_name, $data);
        if ($qry) {
            $id = $ci->db->insert_id();


            $staff_number = 'Vi' . date('Y') . '0' . $id;
            $update = updateRecord(array('id' => $id), $table_name, array('staff_number' => $staff_number, 'password' => md5($staff_number)));

            if ($update) {
                $res = array(
                    'success' => true,
                    'staff_number' => $staff_number,
                    'message' => 'Data saved successfully!!'
                );
            } else {
                $res = array(
                    'success' => false,
                    'message' => 'Problem encountered while assigning an account number'
                );
            }
        } else {
            $res = array(
                'success' => false,
                'message' => 'Problem encountered while saving record, try again!!'
            );
        }

        return $res;
    }
}


if (!function_exists('getTableDataObject')) {
    function getTableDataObjectOrderAsc($table_name, $order_column)
    {
        $ci =& get_instance();
        $qry = $ci->db->order_by($order_column, "desc")->get($table_name);
        return $qry->result();
    }
}



if (!function_exists('insert_batch_records')) {
    function insert_batch_records($table_name, $data)
    {
        $ci =& get_instance();
        $qry = $ci->db->insert_batch($table_name, $data);
        if ($qry) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('getTableData')) {
    function getTableData($table_name)
    {
        $ci =& get_instance();
        $qry = $ci->db->get($table_name);
        return $qry->result_array();
    }
}
if (!function_exists('getColumn')) {
    function getColumn($table, $where, $column)
    {
        $ci =& get_instance();

        $ci->db->select($column)
            ->from($table)
            ->where($where);

        $qry = $ci->db->get()->row($column);
        return $qry;
    }
}


if (!function_exists('getManyColumns')) {
    function getManyColumns($table, $where, $column)
    {
        $ci =& get_instance();

        $ci->db->select($column)
            ->from($table)
            ->where($where);

        $qry = $ci->db->get()->result();
        return $qry;
    }
}






if (!function_exists('updateRecord')) {
    function updateRecord($where, $table_name, $data)
    {
        $ci =& get_instance();
        $ci->db->where($where);
        $qry = $ci->db->update($table_name, $data);
        if ($qry) {
            $res = array(
                'success' => true,
                'message' => 'Record updated successfully!!'
            );
        } else {
            $res = array(
                'success' => true,
                'message' => 'Problem encountered while updating record, try again!!'
            );
        }
        return $res;
    }
}

if (!function_exists('deleteRecord')) {
    function deleteRecord($table_name, $where)
    {
        $ci =& get_instance();
        $ci->db->where($where);
        $qry = $ci->db->delete($table_name);
        if ($qry) {
            $res = array(
                'success' => true,
                'message' => 'Record deleted successfully!!'
            );
        } else {
            $res = array(
                'success' => true,
                'message' => 'Problem encountered while deleting record, try again!!'
            );
        }
        return $res;
    }
}

if (!function_exists('getSingleTableRecord')) {
    function getSingleTableRecord($table_name, $where)
    {
        $ci =& get_instance();
        $qry = $ci->db->get_where($table_name, $where);
        $res = $qry->row();
        return $res;
    }
}

if (!function_exists('getSingleTableRecordasArray')) {
    function getSingleTableRecordasArray($table_name, $where)
    {
        $ci =& get_instance();
        $qry = $ci->db->get_where($table_name, $where);
        $res = $qry->result_array();
        return $res;
    }
}

if (!function_exists('getManyTableRecords')) {
    function getManyTableRecords($table_name, $where)
    {
        $ci =& get_instance();
        $qry = $ci->db->get_where($table_name, $where);
        $res = $qry->result();
        return $res;
    }
}


if (!function_exists('getManyTableRecords_pagination')) {
    function getManyTableRecords_pagination($table_name,$where, $limit, $start)
    {
        $ci =& get_instance();
        $ci->db->limit($limit, $start);
        $qry = $ci->db->get_where($table_name, $where);
        $res = $qry->result();
        return $res;

    }
}
if (!function_exists('get_Pagination_Records')) {
    function get_Pagination_Records($table_name, $limit, $start)
    {
        $ci =& get_instance();
        $ci->db->limit($limit, $start);
        $qry = $ci->db->get($table_name);
        $res = $qry->result_array();
        return $res;

    }
}

function get_comments($start, $limit, $id)
{
    $condition = array('checklist_item_id' => $id, 'status' => 1);
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get_where('Item_comments', $condition);
    $rows = $query->result();
    return $rows;
}

/* Manage the bulk conditions selection */
function ManageData($table_name = '', $condition = array(), $udata = array(), $is_insert = false)
{
    $resultArr = array();
    $ci = &get_instance();
    if ($condition && count($condition))
        $ci->db->where($condition);
    if ($is_insert) {
        $ci->db->insert($table_name, $udata);
        return 0;
    } else {
        $ci->db->update($table_name, $udata);
        return 1;
    }
}


if (!function_exists('approveLoan')) {
    function approveLoan($table_name, $data)
    {
        $ci =& get_instance();
        $qry = $ci->db->insert($table_name, $data);
        if ($qry) {
            $res = array(
                'success' => true,
                'record_id' => $ci->db->insert_id(),
                'message' => 'Loan approval added'
            );
        } else {
            $res = array(
                'success' => false,
                'message' => 'Problem encountered while approving this loan'
            );
        }

        return $res;
    }
}

if (!function_exists('get_count')) {
    function get_count($table_name)
    {
        $ci =& get_instance();
        return $ci->db->count_all($table_name);

    }
}

if (!function_exists('get_count_where')) {
    function get_count_where($table_name, $where)
    {
        $ci =& get_instance();
        return $ci->db->where($where)->from($table_name)->count_all_results();

    }
}


if (!function_exists('decryptValue')) {

    function decryptValue($encrypted_amount)
    {

        $ci =& get_instance();
        $decrypted_amount = $ci->encryption->decrypt($encrypted_amount);
        return $decrypted_amount;
    }
}

if (!function_exists('encryptValue')) {
    function encryptValue($plain_text)
    {

        $ci =& get_instance();
        $encrypted_amount = $ci->encryption->encrypt($plain_text);
        return $encrypted_amount;
    }
}

