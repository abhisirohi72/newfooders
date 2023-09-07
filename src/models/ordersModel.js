const pool= require("./db");

exports.ordersDetails = (fooder_id, formattedDate) => {
    return new Promise((resolve, reject) => {
        try{
            // const sql = `SELECT t1.order_number, t1.status, t1.id as order_id, t2.type *, CASE WHEN status =0 THEN 'pending' WHEN status =1 THEN 'accepted' WHEN status =2 THEN 'order ready' WHEN status =3 THEN 'out for devlievery' ELSE 'rejected' END AS main_status FROM orders as t1 WHERE orders.fooder_id='${fooder_id}' AND orders.order_date='${formattedDate}' AND (orders.status='0' OR orders.status='1' OR orders.status='2') ORDER BY orders.creation_date DESC`;
            const sql = `SELECT orders.order_number, orders.status, orders.order_mode, orders.order_number_qrcode, orders.id as order_id, orders.creation_date, fooders_tables.type FROM orders LEFT JOIN fooders_tables ON fooders_tables.fooder_id=orders.fooder_id and orders.table_id= fooders_tables.id WHERE orders.fooder_id='${fooder_id}' AND orders.order_date='${formattedDate}' AND (orders.status='0' OR orders.status='1' OR orders.status='2') ORDER BY orders.creation_date DESC`;
            // res.send(sql);
            console.log(sql);
            pool.query(sql, async (err, results) => {
                if (err) {
                    console.error('Error executing query:', err);
                    reject(err); // Reject the promise with an error
                } else {
                    resolve(results);
                }
            });
        }catch(queryError){
            reject(queryError);
        }
    });
};