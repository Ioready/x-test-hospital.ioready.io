<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    public function get_appointments() {
        // Fetch all appointments
        $query = $this->db->get('appointments');
        return $query->result();
    }

    public function get_appointment($id) {
        // Fetch a single appointment by ID
        $query = $this->db->get_where('appointments', array('id' => $id));
        return $query->row();
    }

    public function create_appointment($data) {
        // Insert a new appointment
        $this->db->insert('appointments', $data);
    }

    public function update_appointment($id, $data) {
        // Update an existing appointment
        $this->db->where('id', $id);
        $this->db->update('appointments', $data);
    }

    public function delete_appointment($id) {
        // Delete an appointment
        $this->db->where('id', $id);
        $this->db->delete('appointments');
    }
    public function search($query)
    {
        // print_r($query);die;
        // Perform the search query using Active Record or Query Builder
        $this->db->like('patient_id', $query); // Replace 'column_name' with the actual column you want to search against
        $results = $this->db->get('vendor_sale_patient')->result_array(); // Replace 'table_name' with your database table name
        return $results;
    }
}
?>
