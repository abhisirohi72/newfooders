var Password = require("node-php-password");
const pool= require("./db");
const { resolve } = require("path");

exports.upsert= (tablename, coloumn_names, column_values)=>{
    return new Promise((resolve, reject) => {
        try {
            const sql = `INSERT IGNORE INTO ${tablename} (${coloumn_names}) VALUES (?)`;
            const logMessage = `SQL Query: ${sql} with Values: [${column_values}]`;
            console.log(logMessage); // Log the SQL query with values
            pool.query(sql, [column_values], async(err, results)=>{
                if(err){
                    reject(err);
                }else{
                    resolve(results);
                }
            });   
        } catch (error) {
            reject(error);
        }
    });
};

exports.select = (tablename, column, whereCond="", offset="", itemsPerPage="", orderColumn="", orderColumnVal="") => {
    return new Promise((resolve, reject)=> {
        try {
            if(offset=="" && itemsPerPage==""){
                const sql = `SELECT ${column} FROM ${tablename} ${whereCond}`;
                const logMessage = `SQL Query: ${sql} `;
                console.log(logMessage); // Log the SQL query with values
                pool.query(sql, async(err, results)=>{
                    if(err){
                        reject(err);
                    }else{
                        resolve(results);
                    }
                });
            }else{
                const sql = `SELECT ${column} FROM ${tablename} ${whereCond} ORDER BY ${orderColumn} ${orderColumnVal} LIMIT ${offset}, ${itemsPerPage}`;
                const logMessage = `SQL Query: ${sql} with Offset: ${offset}, ItemsPerPage: ${itemsPerPage}`;
                console.log(logMessage); // Log the SQL query with values
                pool.query(sql, async(err, results)=>{
                    if(err){
                        console.log(err);
                        reject(err);
                    }else{
                        resolve(results);
                    }
                });
            }
        } catch (error) {
            reject(error);
        }
    });
};