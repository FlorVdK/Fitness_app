package com.example.fitness_app;

public class ListItem {

    private String head;
    private String desc;
    private int id;

    public ListItem( int id,String head, String desc) {
        this.head = head;
        this.desc = desc;
        this.id = id;
    }

    public int getId() {
        return id;
    }

    public String getHead() {
        return head;
    }

    public String getDesc() {
        return desc;
    }
}
